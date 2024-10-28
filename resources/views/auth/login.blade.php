<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>
    
    <form method="POST" action="/login">
        @csrf
        
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Login</button>
    </form>
</x-layout>