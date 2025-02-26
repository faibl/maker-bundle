<?php

namespace Symfony\Bundle\MakerBundle\Tests\tmp\current_project\src\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Client extends BaseClient
{
    use TimestampableTrait;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string')]
    private $apiKey;

    #[ORM\ManyToMany(targetEntity: Tag::class)]
    private $tags;

    #[ORM\Embedded(class: Embed::class)]
    private $embed;
}
