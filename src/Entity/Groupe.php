<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apiplatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity
 * @ApiResource
 */
class Groupe
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"album", "membregroupe"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=100, nullable=false)
     * @Groups({"album", "membregroupe"})
     * @Assert\NotBlank(message="The name is required")
     * @Assert\Length(
     * max = 100,
     * maxMessage = "The name cannot be longer than {{ limit }} characters",
     * )
     */
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


}
