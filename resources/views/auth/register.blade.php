<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    
    <form method="POST" action="/register">
        @csrf

        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br>
        <label for="password_confirmation">Verify password</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br>

        <button type="submit">Register</button>
    </form>
</x-layout>