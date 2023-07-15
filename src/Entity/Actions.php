<?php

namespace App\Entity;

use App\Repository\ActionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionsRepository::class)]
class Actions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?user $Id_creation = null;

    #[ORM\Column(length: 255)]
    private ?string $Type_audit = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_de_laudit = null;

    #[ORM\Column(length: 255)]
    private ?string $Zone_auditee = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Remarques_commentaires = null;

    #[ORM\Column(length: 255)]
    private ?string $Pilote_de_laction = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $cause_racine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $action_curatif = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $action_correctif = null;

    #[ORM\Column(length: 255)]
    private ?string $Priorite = null;

    #[ORM\Column(length: 255)]
    private ?string $Processus = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $delais = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_de_cloture = null;

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Etat_avancement = null;

    #[ORM\Column(nullable: true)]
    private ?bool $case_diffusion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Liste_diffusion = null;

    #[ORM\Column(length: 255)]
    private ?string $Type_de_risques = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_createur_de_actions = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $illustration = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCreation(): ?user
    {
        return $this->Id_creation;
    }

    public function setIdCreation(?user $Id_creation): self
    {
        $this->Id_creation = $Id_creation;

        return $this;
    }

    public function getTypeAudit(): ?string
    {
        return $this->Type_audit;
    }

    public function setTypeAudit(string $Type_audit): self
    {
        $this->Type_audit = $Type_audit;

        return $this;
    }

    public function getDateDeLaudit(): ?\DateTimeInterface
    {
        return $this->Date_de_laudit;
    }

    public function setDateDeLaudit(\DateTimeInterface $Date_de_laudit): self
    {
        $this->Date_de_laudit = $Date_de_laudit;

        return $this;
    }

    public function getZoneAuditee(): ?string
    {
        return $this->Zone_auditee;
    }

    public function setZoneAuditee(string $Zone_auditee): self
    {
        $this->Zone_auditee = $Zone_auditee;

        return $this;
    }

    public function getRemarquesCommentaires(): ?string
    {
        return $this->Remarques_commentaires;
    }

    public function setRemarquesCommentaires(string $Remarques_commentaires): self
    {
        $this->Remarques_commentaires = $Remarques_commentaires;

        return $this;
    }

    public function getPiloteDeLaction(): ?string
    {
        return $this->Pilote_de_laction;
    }

    public function setPiloteDeLaction(string $Pilote_de_laction): self
    {
        $this->Pilote_de_laction = $Pilote_de_laction;

        return $this;
    }

    public function getCauseRacine(): ?string
    {
        return $this->cause_racine;
    }

    public function setCauseRacine(string $cause_racine): self
    {
        $this->cause_racine = $cause_racine;

        return $this;
    }

    public function getActionCuratif(): ?string
    {
        return $this->action_curatif;
    }

    public function setActionCuratif(?string $action_curatif): self
    {
        $this->action_curatif = $action_curatif;

        return $this;
    }

    public function getActionCorrectif(): ?string
    {
        return $this->action_correctif;
    }

    public function setActionCorrectif(?string $action_correctif): self
    {
        $this->action_correctif = $action_correctif;

        return $this;
    }

    public function getPriorite(): ?string
    {
        return $this->Priorite;
    }

    public function setPriorite(string $Priorite): self
    {
        $this->Priorite = $Priorite;

        return $this;
    }

    public function getProcessus(): ?string
    {
        return $this->Processus;
    }

    public function setProcessus(string $Processus): self
    {
        $this->Processus = $Processus;

        return $this;
    }

    public function getDelais(): ?\DateTimeInterface
    {
        return $this->delais;
    }

    public function setDelais(\DateTimeInterface $delais): self
    {
        $this->delais = $delais;

        return $this;
    }

    public function getDateDeCloture(): ?\DateTimeInterface
    {
        return $this->date_de_cloture;
    }

    public function setDateDeCloture(\DateTimeInterface $date_de_cloture): self
    {
        $this->date_de_cloture = $date_de_cloture;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getEtatAvancement(): ?string
    {
        return $this->Etat_avancement;
    }

    public function setEtatAvancement(?string $Etat_avancement): self
    {
        $this->Etat_avancement = $Etat_avancement;

        return $this;
    }

    public function isCaseDiffusion(): ?bool
    {
        return $this->case_diffusion;
    }

    public function setCaseDiffusion(?bool $case_diffusion): self
    {
        $this->case_diffusion = $case_diffusion;

        return $this;
    }

    public function getListeDiffusion(): ?string
    {
        return $this->Liste_diffusion;
    }

    public function setListeDiffusion(?string $Liste_diffusion): self
    {
        $this->Liste_diffusion = $Liste_diffusion;

        return $this;
    }

    public function getTypeDeRisques(): ?string
    {
        return $this->Type_de_risques;
    }

    public function setTypeDeRisques(string $Type_de_risques): self
    {
        $this->Type_de_risques = $Type_de_risques;

        return $this;
    }

    public function getIdCreateurDeActions(): ?int
    {
        return $this->id_createur_de_actions;
    }

    public function setIdCreateurDeActions(int $id_createur_de_actions): self
    {
        $this->id_createur_de_actions = $id_createur_de_actions;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(?string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

   
    public function __toString()
    {
        return $this->Type_de_risques;
    }


}
