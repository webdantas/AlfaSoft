<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;

class ContactFormValidationTest extends TestCase
{
    use RefreshDatabase; // Adiciona o trait para migrar o banco de dados

    /**
     * Testa a validação do formulário ao adicionar um contato.
     *
     * @return void
     */
    public function test_add_contact_form_validation()
    {
        $response = $this->post('/contacts', [
            'name' => '',  // Name is required
            'contact' => '123',  // Contact should be 9 digits
            'email' => 'invalid-email',  // Invalid email format
        ]);

        $response->assertStatus(302);  // Verifica se a resposta é um redirecionamento
        $errors = session('errors');  // Obtém os erros da sessão

        $this->assertNotNull($errors, 'Os erros não estão presentes na sessão.');
        $this->assertTrue($errors->has('name'));
        $this->assertTrue($errors->has('contact'));
        $this->assertTrue($errors->has('email'));
    }

    /**
     * Testa a validação do formulário ao editar um contato.
     *
     * @return void
     */
    public function test_edit_contact_form_validation()
    {
        $contact = Contact::factory()->create(); // Corrige a criação de instância usando factory()

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => '',  // Name is required
            'contact' => '123',  // Contact should be 9 digits
            'email' => 'invalid-email',  // Invalid email format
        ]);

        $response->assertStatus(302);  // Verifica se a resposta é um redirecionamento
        $errors = session('errors');  // Obtém os erros da sessão

        $this->assertNotNull($errors, 'Os erros não estão presentes na sessão.');
        $this->assertTrue($errors->has('name'));
        $this->assertTrue($errors->has('contact'));
        $this->assertTrue($errors->has('email'));
    }
}
