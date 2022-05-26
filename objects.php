<?php // objects.php

  /****
  * Definición de clases e instansación
  */
 class Project
 {

   protected string $projectName;
   protected array $team;

	 public function init(){}

   public function __construct(string $name, array $member = [])
   {
     $this->projectName = $name;
     $this->team = $member;
   }

	 public function getName(): string
	 {
		 return $this->projectName;
	 }
	 public function getTeam(): array
	 {
		 return $this->team;
	 }

   public function addMember(User $member)
   {
     $this->team[] = $member;
   }
 }

 class User
 {
	 protected string $name;
	 protected string $email;

	 public function __construct(string $name, string $email)
	 {
		 $this->name = $name;
		 $this->email = $email;
	 }
 }

 $projectTest = new Project('Aprender php',[
	 new User('Pedro', 'pedro@email.com'),
	 new User('Marisel', 'marisel@email.com')
 ]);

 var_dump($projectTest);
