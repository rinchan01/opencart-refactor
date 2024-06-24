<?php

namespace App\Jobs;

use App\Repositories\CustomerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customerRepository;
    private $email;
    public function __construct(CustomerRepository $customerRepository, int $email)
    {
        $this->customerRepository = $customerRepository;
        $this->email = $email;
        $this->onQueue('customer');
    }

    public function handle(): void
    {
        $this->customerRepository->delete($this->email);
    }
}
