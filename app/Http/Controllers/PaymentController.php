<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $plans = [
        'individual' => [
            'title' => 'Individual Plans',
            'description' => 'Choose the perfect plan that fits your fitness journey',
            'plans' => [
                'monthly' => [
                    'name' => 'Monthly',
                    'price' => 150000,
                    'registration' => 50000,
                    'duration' => '1 month',
                    'period' => '/month'
                ],
                'three_months' => [
                    'name' => '3 Months',
                    'price' => 400000,
                    'registration' => 50000,
                    'duration' => '3 months',
                    'period' => '/3 months'
                ],
                'six_months' => [
                    'name' => '6 Months',
                    'price' => 800000,
                    'registration' => 50000,
                    'duration' => '6 months',
                    'period' => '/6 months',
                    'tag' => 'Popular'
                ],
                'annual' => [
                    'name' => 'Annual',
                    'price' => 1600000,
                    'registration' => 50000,
                    'duration' => '1 year',
                    'period' => '/year',
                    'tag' => 'Best Value'
                ]
            ]
        ],
        'group' => [
            'title' => 'Group/Corporate Plans',
            'description' => 'Better rates for group memberships',
            'plans' => [
                'group_5' => [
                    'name' => '5 People',
                    'price' => 125000,
                    'registration' => 50000,
                    'duration' => '1 month',
                    'period' => '/person/month',
                    'min_people' => 5
                ],
                'group_10' => [
                    'name' => '10 People',
                    'price' => 100000,
                    'registration' => 50000,
                    'duration' => '1 month',
                    'period' => '/person/month',
                    'min_people' => 10
                ]
            ]
        ],
        'special' => [
            'title' => 'Special Plans',
            'description' => 'Special rates for students and daily visits',
            'plans' => [
                'student' => [
                    'name' => 'Student Plan',
                    'price' => 100000,
                    'registration' => 25000,
                    'duration' => '1 month',
                    'period' => '/month'
                ],
                'daily_regular' => [
                    'name' => 'Daily Regular',
                    'price' => 40000,
                    'registration' => 0,
                    'duration' => '1 day',
                    'period' => '/day'
                ],
                'daily_student' => [
                    'name' => 'Daily Student',
                    'price' => 10000,
                    'registration' => 0,
                    'duration' => '1 day',
                    'period' => '/day'
                ]
            ]
        ]
    ];

    public function index()
    {
        return view('landing.membership', [
            'planCategories' => $this->plans
        ]);
    }

    public function show($planType, $planId)
    {
        if (!isset($this->plans[$planType]['plans'][$planId])) {
            abort(404);
        }

        $plan = $this->plans[$planType]['plans'][$planId];
        $totalPrice = $plan['price'] + $plan['registration'];

        return view('landing.payment', [
            'plan' => $plan,
            'totalPrice' => $totalPrice,
            'category' => $this->plans[$planType]['title'],
            'planCategories' => $this->plans
        ]);
    }
}
