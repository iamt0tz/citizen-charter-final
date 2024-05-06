<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $programs = [

            ['name'=>'Grievance Intake and Response','section_id'=>'1',],
            ['name'=>'Request for Use and Monitoring of Vehicle','section_id'=>'2',],
            ['name'=>'Request for Technical Assistance relative to Building and Grounds Management','section_id'=>'2',],
            ['name'=>'Procurement under Shopping under Section 52.1 (B)','section_id'=>'3',],
            ['name'=>'Competitive Bidding of Goods and Services','section_id'=>'3',],
            ['name'=>'Procurement under Direct Retail Purchase of Petroleum Fuel, Oil and Lubricant (POL) Products and Airline Tickets','section_id'=>'3',],
            ['name'=>'Procurement under Small Value Procurement','section_id'=>'3',], 
            ['name'=>'Recording, Documentation and Issuance of Expendable or Consumable Supplies','section_id'=>'4',],
            ['name'=>'Recording, Documentation and Issuance of PPE and Semi-Expendable Properties','section_id'=>'4',],
            ['name'=>'Transfer of Property Accountability','section_id'=>'4',],
            ['name'=>'Issuance of Sticker Pass','section_id'=>'4',],
            ['name'=>'Issuance of Property Clearance for Separated Official and Employees','section_id'=>'4',],
            ['name'=>'Recording, Documentation and Issuance of PPE and Semi-Expendable Properties','section_id'=>'5',],
            ['name'=>'Transfer of Property Accountability','section_id'=>'5',],
            ['name'=>'Issuance of Gate Pass for Service Providers and Suppliers','section_id'=>'5',],
            ['name'=>'Surrender/Turnover of Property and Cancellation of Property Accountability','section_id'=>'5',],
            ['name'=>'Issuance of Property Clearance for Separated Official and Employees','section_id'=>'5',],
            ['name'=>'Recording, Documentation and Issuance of Expendable or Consumable Supplies','section_id'=>'5',], 
            ['name'=>'Processing of Outgoing Documents','section_id'=>'6',],
            ['name'=>'Processing of Incoming of Documents','section_id'=>'6',],
            ['name'=>'Disposal of Valueless Records','section_id'=>'6',],
            ['name'=>'Processing of Relief Augmentation Request by DSWD Field Offices','section_id'=>'7',],
            ['name'=>'ADRP Preparation of the Budget and Financial Accountability Reports (BFARS)','section_id'=>'8',],
            ['name'=>'Budget Section Process Flow in the Obligation of Financial Claims','section_id'=>'9',],
            ['name'=>'Preparation of the Work and Financial Plan','section_id'=>'9',],
            ['name'=>'Provision of Assistance to Distressed Employees','section_id'=>'10',],
            ['name'=>'Certification of Performance Rating','section_id'=>'11',],
            ['name'=>'Recruitment, Selection and Placement in the Field Office','section_id'=>'11',],
            ['name'=>'Issuance of Certificate of Employment to current officials, employees and Contract of Service Workers','section_id'=>'12',],
            ['name'=>'Issuance of Certificate of Employment to Separated Officials, Employees, and Contract of Service Workers','section_id'=>'12',], 
            ['name'=>'Issuance of Service Record to current Officials and Employees','section_id'=>'12',],
            ['name'=>'Issuance of Service Record to Separated Officials and Employees','section_id'=>'12',],
            ['name'=>'Handling of 8888 Complaints and Grievances (Group: Program wide/Division Wide)','section_id'=>'13',], 
            ['name'=>'Technical Assistance on STB-developed Programs and Projects','section_id'=>'14',],
            ['name'=>'ICT Support Services','section_id'=>'15',],
            ['name'=>'Data-sharing. Statistics/Raw Data Request','section_id'=>'16',],
            ['name'=>'Data Sharing with DSWD OBSUs- Name Matching','section_id'=>'16',],
            ['name'=>'Accreditation of Pre - Marriage Counselors','section_id'=>'17',],
            ['name'=>'Registration of Private Social Welfare and Development Agencies (SWDAS) - Operating in one Region','section_id'=>'17',],
            ['name'=>'Referral Management Process for SLP-RPMO','section_id'=>'18',],
            ['name'=>'Grievance Management Process for SLP-RPMO','section_id'=>'18',],
            ['name'=>'Provision of Assistance to Clients of the Vocational Rehabilitation Centers','section_id'=>'19',],
            ['name'=>'Case Management in Center and Residential Care Facility','section_id'=>'19',], 
            ['name'=>'Implementation of the Assistance to Individuals in Crisis Situation Program for Clients Transacting with the DSWD Offices (CIU/CIS/SWAD OFFICES)','section_id'=>'20',],
            ['name'=>'Implementation of the Assistance to Individuals in Crisis Situation Program for Clients Tagged as Group of Individuals','section_id'=>'20',],
            ['name'=>'Provision of Assistance under the Recovery and Reintegration Program for Trafikked Persons (RRPTP)','section_id'=>'21',], 
            ['name'=>'Procedure for Social Pension Provision to Indigent Senior Citizens','section_id'=>'22',],
            ['name'=>'Provision of Centenarian Gift to Centenarians','section_id'=>'22',],
            ['name'=>'Securing Travel Clearance for Minors Traveling Abroad','section_id'=>'23',],
            ['name'=>'Provision of Resource Person to DSWD Intermediaries and Stakeholders','section_id'=>'24',],


        ];        

        foreach ($programs as $key => $programs) {
                    Program::create($programs);
                }
    

        }
    }

