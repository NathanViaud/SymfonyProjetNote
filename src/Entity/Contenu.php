<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Apiplatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * Contenu
 *
 * @ORM\Table(name="contenu", uniqueConstraints={@ORM\UniqueConstraint(name="contenu_uq", columns={"IDMORCEAU", "IDALBUM"})}, indexes={@ORM\Index(name="contenu_album_fk", columns={"IDALBUM"}), @ORM\Index(name="IDX_89C2003FAD7D3E89", columns={"IDMORCEAU"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"contenu"}})
 */
class Contenu
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
     * @var \Morceau
     * @ApiSubresource
     * @ORM\ManyToOne(targetEntity="Morceau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDMORCEAU", referencedColumnName="ID")
     * })
     * @Groups({"contenu"})
     */
    private $idmorceau;

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

    public function getIdmorceau(): ?Morceau
    {
        return $this->idmorceau;
    }

    public function setIdmorceau(?Morceau $idmorceau): self
    {
        $this->idmorceau = $idmorceau;

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
