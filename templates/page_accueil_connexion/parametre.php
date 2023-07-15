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
 
      <!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Paramètre
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    -->
    </form>

</nav>

    <p><a href="{{path('modification_mot_de_passe')}}">Modifier mon mot de passe</a></p>
   

    <!-- -->

</div>
{% endblock %}
