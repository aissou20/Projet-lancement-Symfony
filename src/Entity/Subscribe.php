<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

final class Subscribe
{
    /**
     * @Assert\Length(min=1)
     * @Assert\NotBlank()
     */
    public string $pseudo;
    /**
     * @Assert\Length(min=1)
     * @Assert\NotBlank()
     */
    public string $name;
    /**
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    public string $email;

}