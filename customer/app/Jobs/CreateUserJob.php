<?php

namespace App\Jobs;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Log;

class CreateUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    public function __construct(array $userData)
    {
        $this->data = $userData;
        $this->onQueue('customer');
        Log::info('CreateUserJob Constructed', ['userData' => $this->data]);
    }

    public function handle(): void
    {
        $customerRepository = app(CustomerRepository::class);
        $this->data['customer_group_id'] = $this->data['user_group_id'];
        unset($this->data['user_group_id']);
        $customerRepository->save($this->data);
    }
}
