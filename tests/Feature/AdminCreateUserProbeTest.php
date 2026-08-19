<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AdminCreateUserProbeTest extends TestCase
{
    public function test_probe_admin_create_user_flow()
    {
        Mail::fake();

        $admin = Admin::first();
        $this->assertNotNull($admin, 'No admin found');
        Auth::guard('admin')->loginUsingId($admin->id);

        // 1. GET the create-new-user page
        $response = $this->get(route('createnewuser'));
        $response->assertStatus(200);

        // 2. POST to create a user
        $email = 'probe' . mt_rand(1000, 99999) . '@example.com';
        $response = $this->post(route('createuser'), [
            'name' => 'Probe User',
            'middlename' => 'M',
            'lastname' => 'Last',
            'username' => 'probeuser' . mt_rand(1000, 9999),
            'email' => $email,
            'phone' => '1234567890',
            'dob' => '1990-01-01',
            'address' => '123 Test St',
            'country' => 'United States',
            'accounttype' => 'Checking Account',
            'usernumber' => '99999999999',
            'balance' => '500',
            'code1' => '1111111',
            'code2' => '2222222',
            'code3' => '3333333',
            'pin' => '1234',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);

        $user = User::where('email', $email)->first();
        $this->assertNotNull($user, 'User was NOT created');
        fwrite(STDERR, "\nUSER CREATED id={$user->id}\n");

        // 3. Verify duplicate email validation fails
        $response = $this->post(route('createuser'), [
            'name' => 'Probe User',
            'middlename' => 'M',
            'lastname' => 'Last',
            'username' => 'probeuser' . mt_rand(1000, 9999),
            'email' => $email,
            'phone' => '1234567890',
            'dob' => '1990-01-01',
            'address' => '123 Test St',
            'country' => 'United States',
            'accounttype' => 'Checking Account',
            'usernumber' => '88888888888',
            'balance' => '500',
            'code1' => '1111111',
            'code2' => '2222222',
            'code3' => '3333333',
            'pin' => '1234',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);
        $response->assertSessionHasErrors('email');
        fwrite(STDERR, "DUPLICATE EMAIL VALIDATION OK\n");

        $this->assertTrue(true);
    }
}