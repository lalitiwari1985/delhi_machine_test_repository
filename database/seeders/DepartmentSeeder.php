<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            "Animal Husbandry Department, Madhya Pradesh",
            "Backward Classes and Minorities Welfare Department, Madhya Pradesh",
            "Bhopal Gas Tragedy Relief and Rehabilitation Department, Madhya Pradesh",
            "Bio Diversity and Bio Technology Department, Madhya Pradesh",
            "Civil Aviation Department, Madhya Pradesh",
            "Co-operation Department, Madhya Pradesh",
            "Commercial Taxes Department, Madhya Pradesh",
            "Culture Department, Madhya Pradesh",
            "Energy Department, Madhya Pradesh",
            "Farmer Welfare and Agriculture Development Department, Madhya Pradesh",
            "Finance Department, Madhya Pradesh",
            "Fisheries Department, Madhya Pradesh",
            "Food, Civil Supplies and Consumer Protection Department, Madhya Pradesh",
            "Forest Department, Madhya Pradesh",
            "General Administration Department, Madhya Pradesh",
            "Higher Education Department, Madhya Pradesh",
            "Home Department, Madhya Pradesh",
            "Horticulture and Food Processing Department, Madhya Pradesh",
            "Housing and Environment Department, Madhya Pradesh",
            "Indian Systems of Medicine and Homoeopathy (AYUSH) Department, Madhya Pradesh",
            "Industrial Policy and Investment Promotion Department, Madhya Pradesh",
            "Jail Department, Madhya Pradesh",
            "Labour Department, Madhya Pradesh",
            "Law and Legislative Department, Madhya Pradesh",
            "Medical Education Department, Madhya Pradesh",
            "Micro, Small Medium Enterprises Department, Madhya Pradesh",
            "Mineral Resources Department, Madhya Pradesh",
            "Narmada Valley Development Department, Madhya Pradesh",
            "Overseas Indian Department, Madhya Pradesh",
            "Panchayat and Rural Development Department, Madhya Pradesh",
            "Parliamentary Affairs Department, Madhya Pradesh",
            "Planning, Economics and Statistics Department, Madhya Pradesh",
            "Printing and Stationery Department, Madhya Pradesh",
            "Public Enterprises Department, Madhya Pradesh",
            "Public Health and Family Welfare Department, Madhya Pradesh",
            "Public Relations Department, Madhya Pradesh",
            "Public Works Department, Madhya Pradesh",
            "Registration and Stamps, Commercial Taxes Department, Madhya Pradesh",
            "Rehabilitation Department, Madhya Pradesh",
            "Religious Trusts and Endowments Department, Madhya Pradesh",
            "Revenue Department, Madhya Pradesh",
            "School Education Department, Madhya Pradesh",
            "Science and Technology (Information Technology) Department, Madhya Pradesh",
            "Social Welfare Department, Madhya Pradesh",
            "Sports and Youth Welfare Department, Madhya Pradesh",
            "Technical Education and Man Power Planning Department, Madhya Pradesh",
            "Tourism Department, Madhya Pradesh",
            "Transport Department, Madhya Pradesh",
            "Tribal Welfare and Scheduled Caste (SC) Department, Madhya Pradesh",
            "Water Resources Department, Madhya Pradesh",
            "Women and Child Development Department, Madhya Pradesh",
        ];

        // Inserting departments into the database
        foreach ($departments as $department) {
            Department::create(['name' => $department]);
        }
    }
}
