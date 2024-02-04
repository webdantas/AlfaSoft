<label for="name">Name:</label>
<input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}" required>

<label for="contact">Contact:</label>
<input type="text" name="contact" value="{{ old('contact', $contact->contact ?? '') }}" required maxlength="9" pattern="[0-9]{1,9}">

<label for="email">Email:</label>
<input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" required>
