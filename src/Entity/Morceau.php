<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apiplatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Morceau
 *
 * @ORM\Table(name="morceau")
 * @ORM\Entity
 * @ApiResource
 */
class Morceau
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"contenu"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE", type="string", length=100, nullable=false)
     * @Groups({"contenu"})
     * @Assert\NotBlank(message="The title is required")
     * @Assert\Length(
     *   max = 100,
     *   maxMessage = "The title cannot be longer than {{ limit }} characters",
     * )
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="DUREE", type="string", length=5, nullable=false, options={"fixed"=true})
     * @Groups({"contenu"})
     * @Assert\NotBlank(message="The duration is required")
     * @Assert\Length(
     *  max = 5,
     *  maxMessage = "The duration cannot be longer than {{ limit }} characters",
     * )
     */
    private $duree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }


}
