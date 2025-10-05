<?php

namespace App\Console\Commands;

// Laravel command class for Artisan commands
use Illuminate\Console\Command;

// For hashing passwords securely
use Illuminate\Support\Facades\Hash;

// For database operation
use Illuminate\Support\Facades\DB;

// To handle database errors
use Illuminate\Database\QueryException;

// Plugin 1 : Faker to generate random emails and passwords
use Faker\Factory as Faker;

// Plugin 2 : Symfony Console Table to display output in a table in terminal
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;

class CreateUser extends Command
{

    protected $signature = 'user:create {--random : Create a user with random email and password}';
    protected $description = 'Create a demo user with hashed password, optionally using Faker for random data';

    public function handle()
    {
        // Initialize Faker instance for generate random data
        $faker = Faker::create();

        // Check the command and respond
        if ($this->option('random')) {
            // Generate random email and password using Faker
            $email = $faker->unique()->safeEmail;      // Unique safe email
            $password = $faker->password(8, 12); // Random password length between 8-12
            $this->info("Display the password " .$password);
            $this->info("Generating random user..."); // Inform user in terminal

        } else {
            // Manual input mode: Ask for email and password
            $email = $this->ask('Enter user email');       // Prompt for email
            $password = $this->secret('Enter user password'); // Prompt for password (hidden input)
        }

        // Hash the password using laravel's Hash facade
        $hashedPassword = Hash::make($password);

        try {
            // Insert user data into the 'users' table
            DB::table('users')->insert([
                'name'       => explode('@', $email)[0], 
                'email'      => $email,                  
                'password'   => $hashedPassword,         
                'created_at' => now(),                   
                'updated_at' => now()                  
            ]);

            // Symfony Console Table to display in terminal
            $table = new Table($this->output);
            $table->setHeaders(['Field', 'Value']) // Headings
                  ->setRows([
                      ['Status', 'User successfully created!'], // First row
                      new TableSeparator(),                     // Separator line
                      ['Email', $email],                        // Row showing user email
                      ['Hashed Password', $hashedPassword]      // Row showing hashed password
                  ]);
            $table->render(); // Render table in terminal

        } catch (QueryException $e) {
            // Handle error if duplicate email is inserted
            if ($e->getCode() == 23000) {
                $this->error("This email already exists! Please try another email.");
            } else {
                // Handle any other database errors
                $this->error("Database error: " . $e->getMessage());
            }
        }

        return 0; // Command finished
    }
}
