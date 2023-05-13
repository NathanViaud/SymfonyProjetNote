<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apiplatform\Core\Annotation\ApiResource;
use Apiplatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Vente
 *
 * @ORM\Table(name="vente", uniqueConstraints={@ORM\UniqueConstraint(name="vente_unique", columns={"IDALBUM", "MOIS", "ANNEE"})}, indexes={@ORM\Index(name="IDX_888A2A4CD0D8FC40", columns={"IDALBUM"})})
 * @ORM\Entity
 * @ApiResource
 */
class Vente
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="MOIS", type="integer", nullable=false)
     * @Assert\NotBlank(message="The month is required")
     * @Assert\Range(
     * min = 1,
     * max = 12,
     * notInRangeMessage = "The month must be between {{ min }} and {{ max }}",
     * )
     */
    private $mois;

    /**
     * @var int
     *
     * @ORM\Column(name="ANNEE", type="integer", nullable=false)
     * @Assert\NotBlank(message="The year is required")
     * @Assert\Range(
     * min = 1900,
     * max = 2100,
     * notInRangeMessage = "The year must be between {{ min }} and {{ max }}",
     * )
     */
    private $annee;

    /**
     * @var int
     *
     * @ORM\Column(name="NBVENTES", type="integer", nullable=false)
     * @Assert\NotBlank(message="The number of sales is required")
     * @Assert\Positive(message="The number of sales must be positive")
     */
    private $nbventes;

    /**
     * @var \Album
     * @ApiSubresource
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDALBUM", referencedColumnName="ID")
     * })
     */
    private $idalbum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMois(): ?int
    {
        return $this->mois;
    }

    public function setMois(int $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNbventes(): ?int
    {
        return $this->nbventes;
    }

    public function setNbventes(int $nbventes): self
    {
        $this->nbventes = $nbventes;

        return $this;
    }

    public function getIdalbum(): ?Album
    {
        return $this->idalbum;
    }

    public function setIdalbum(?Album $idalbum): self
    {
        $this->idalbum = $idalbum;

        return $this;
    }


}
