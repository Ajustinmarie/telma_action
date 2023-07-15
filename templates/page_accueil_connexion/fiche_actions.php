{% extends 'base.html.twig' %}

{% block title %}Hello PageAccueilConnexionController!{% endblock %}

{% block body %}
<style>
  /*  .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; } */
</style>


    <h1>Bonjour Justin ✅</h1>
    
    <h5>Bienvenue dans ton espace compte. C'est dans cet espace que vous allez pouvoir gerer l'ensemble de vos taches </h5>

    <!-- -->

<div class="contenu">


<div class="class="conteneur">

                 

                    {% if notification %}
                    
                   
                    <div class="alert-danger" role="alert" >{{ notification }}</div>

                    {% endif %}


                    {% if notification_succes %}

                    <div class="alert-success" role="alert">{{ notification_succes }}</div>

                    {% endif %}

                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <!-- <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="{{path('page_accueil_connexion')}}">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{path('menu_plan_actions')}}">Plan d'actions</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{path('parametre')}}">Paramètres</a>
                    </li>

</div>


</div class="class="conteneur">
            <div class="class="conteneur">
            <p>Action n°: {{nb_prochaine_action}}</p>
            {{form_start(form)}}

<div class="row">
        <div class="col-md-6">{{ form_row(form.Type_audit) }}</div>
        <div class="col-md-6">{{ form_row(form.Zone_auditee) }}</div>
        <div class="col-md-6">{{ form_row(form.Date_de_laudit) }}</div>
        <div class="col-md-6">{{ form_row(form.Remarques_commentaires) }}</div>
        <div class="col-md-6">{{ form_row(form.Pilote_de_laction) }}</div>
        <div class="col-md-6">{{ form_row(form.cause_racine) }}</div>
        <div class="col-md-6">{{ form_row(form.action_curatif) }}</div>
        <div class="col-md-6">{{ form_row(form.action_correctif) }}</div>
        <div class="col-md-6">{{ form_row(form.Priorite) }}</div>
        <div class="col-md-6">{{ form_row(form.Processus) }}</div>
        <div class="col-md-6">{{ form_row(form.delais) }}</div>
        <div class="col-md-6">{{ form_row(form.date_de_cloture) }}</div>     
        <div class="col-md-6">{{ form_row(form.Status) }}</div>   
        <div class="col-md-6">{{ form_row(form.Etat_avancement) }}</div>    
        <div class="col-md-6">{{ form_row(form.Type_de_risques) }}</div>  
        <div class="col-md-6">{{ form_row(form.illustration) }}</div>   
        <div class="col-md-6">{{ form_row(form.case_diffusion) }} <br/> {{ form_row(form.Liste_diffusion) }}</div>   
        </div>
        {{form_end(form)}}
        </div>
</div>



{% endblock %}
