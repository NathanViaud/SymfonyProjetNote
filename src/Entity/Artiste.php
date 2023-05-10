<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apiplatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

/**
 * Artiste
 *
 * @ORM\Table(name="artiste")
 * @ORM\Entity
 * @ApiResource
 * @ApiFilter(BooleanFilter::class, properties={"estchanteur"})
 */
class Artiste
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"album"}, "membregroupe")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=100, nullable=false)
     * @Groups({"album", "membregroupe"})
     */
    private $nom;

    /**
     * @var bool
     *
     * @ORM\Column(name="ESTCHANTEUR", type="boolean", nullable=false)
     * @Groups({"album", "membregroupe"})
     */
    private $estchanteur;

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

    public function isEstchanteur(): ?bool
    {
        return $this->estchanteur;
    }

    public function setEstchanteur(bool $estchanteur): self
    {
        $this->estchanteur = $estchanteur;

        return $this;
    }


}
