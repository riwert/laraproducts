<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $oldProduct;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $oldProduct)
    {
        $this->product = $product;
        $this->oldProduct = $oldProduct;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.product-updated');
    }
}
