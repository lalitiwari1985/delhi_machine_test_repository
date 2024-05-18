<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class EmployeeCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function build()
    {
        $data = [
            'name' => $this->employee->name,
            'email' => $this->employee->email,
            'department' => $this->employee->department->name,
        ];

        $imagePath = Storage::disk('public')->path('images/ashok_chakra.png');

        return $this->view('emails.employee_created', $data)
            ->attach($imagePath, [
                'as' => 'ashok_chakra.png',
                'mime' => 'image/png',
            ]);
    }
}
