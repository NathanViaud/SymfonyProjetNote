<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apiplatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Apiplatform\Core\Annotation\ApiSubresource;

/**
 * Membregroupe
 *
 * @ORM\Table(name="membregroupe", uniqueConstraints={@ORM\UniqueConstraint(name="membregroupe_uq", columns={"IDGROUPE", "IDARTISTE"})}, indexes={@ORM\Index(name="membregroupe_artiste_fk", columns={"IDARTISTE"}), @ORM\Index(name="IDX_38A76F3CA637BDC1", columns={"IDGROUPE"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"membregroupe"}})
 */
class Membregroupe
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"membregroupe"})
     */
    private $id;

    /**
     * @var \Artiste
     * @ApiSubresource
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDARTISTE", referencedColumnName="ID")
     * })
     * @Groups({"membregroupe"})
     */
    private $idartiste;

    /**
     * @var \Groupe
     * @ApiSubresource
     * @ORM\ManyToOne(targetEntity="Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDGROUPE", referencedColumnName="ID")
     * })
     * @Groups({"membregroupe"})
     */
    private $idgroupe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdartiste(): ?Artiste
    {
        return $this->idartiste;
    }

    public function setIdartiste(?Artiste $idartiste): self
    {
        $this->idartiste = $idartiste;

        return $this;
    }

    public function getIdgroupe(): ?Groupe
    {
        return $this->idgroupe;
    }

    public function setIdgroupe(?Groupe $idgroupe): self
    {
        $this->idgroupe = $idgroupe;

        return $this;
    }


}
