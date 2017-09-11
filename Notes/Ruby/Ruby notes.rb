# Ruby notes

# fonctions 

#def mafonction paramtre1, parametre2
	#code
#	end
#

# fonction params multiples :
# def somme *nombres
# 	sum = 0
# 	nombres.each{|x| sum+=x}
# 	sum
# 	end

# déclarer module
# module Monmodule
# 	def self.ma_fonction
# end 
#end

#$tableay_taches = {
#	{ id: 0, content => "Ameliorer taskman", flags: %w(important urgent)}
#}

# déclarer une classe exemple
#
# class chien
# attr_accessor :nom
# def initialize
#end
# def aboyer
# 	puts "#{self.nom} fait woof"
# end
# end

#exemple class héritage

#class ChienPolicier < Chien
#	attr_accessor :matricule
#
#	def initialize nom, matricule // rajout
#		super(nom) // call classe mère
#
#		@matricule = matricule
#	end
#
#	def chercher_objet
#		puts "*cherche*"
#	end
#
#	# redefinition
#	def aboyer
#		puts "le chien nn'aboie pas"
#	end
#end





module Task
	OPTION_DEFAULT = {
		flags: [],
		date: nil

	}

	@tableau_taches = [
	{ id: 0, content => "Ameliorer taskman", flags: %w(important urgent)}
	]

	def self.supprimer id
		 @tableau_taches.reject!{ |tache| tache[:id]==id.to i }

	end

	def self.ajouter params
	contenu = params.shift

	tache = {}
	tache[:id] = @tableau_taches.map{ |tache| tache[:id] }.max+1



	tache.merge!(Task::OPTION_DEFAULT)

	tache [:content] = contenu

	params.each do |argument|
		champ, valeur = argument.split(':')

		if champ == "flags"
			tache[champ.to_sym] = valeur.split(",")
		else
			tache[champ.to.sym] = valeur

	end

	@tableau_taches << tache
	end
end

def self.afficher
	puts "*****Taskman*****"
	puts "LISTE DES TACHES"

	@tableau_taches.each do |tache|
		puts "#{tache[:id]} - #{tache[:content]} (#{tache[:flags].join(",")})"
	end

end



end






#def on_command action
#	$command = ARGV.shift

#	if not block_given?
#		raise "on_command a besoin d'un block"

#	id action == $command
#	yield(ARGV)
#	$command_faite = true
#	end
#end

#def on_else_command
#if $command_faite.nil?
#	yield(ARGV)
#end

#def parser_commande command

#case command
#	when 'add'
#	$tableau_taches << ajouter(ARGV)

#when 'del'
#	supprimer  ARGV.shift.to_i

#when 'mod'
#	puts 'faire action modifier'
#else
#	puts 'faire autre chose'
#	end
#
#end


module Command

	@command = {}



	def self.register command, arguments, description, &block
	@commands[command] = {
		keyword: command,
		arguments: arguments,
		description: description,
		block: block
	}
	end

	def self.lancer
	@command = ARGV.shift

	is_executed = flase
	@command.each do |k, v|
		if k == command
			is_executed = true
			v[:block].call(ARGV)
		end
	end

	unless is_executed
		afficher_aide
	end
	end


	def self.afficher_aide
	puts "taskman [commande] [contenu|id] [options...]"
	purs "-------------------------------"
	@commands.each do |k, v|
		puts "#{v[:keyword]} #{v[arguments]}\t *#{v[description]}"
	end
	#puts "del :id\t\t* Supprime la tache avec l'id :id"
	#puts "mod :id\t\t* Modifie la tache avec l'id :id"
	#puts "add :contenu (options...) \t\t* crée une nouvelle tache :id"
	#puts "list :filtre\t\t* liste les taches selon le filtre donné"


	end

end





#on_command('del'){ |arguments| supprimer arguments.shift.to.i }
#on_command('mod'){ |arguments| puts 'faire action modifier'}
#on_command('list'){ |arguments| puts "permet de lister et filtrer nos taches" }
#on_command('test')

Command.register 'add', ':contenu (options...)', 'Créé unen nouvelle tache.' do |arguments|
	Task.ajouter(arguments)

end

Command.register 'del', ':id', 'Supprime une tache' do |args|
	Task.supprimer args.shift.to.i 
end

Command.register 'mod', ':id (options...)' 'Modifie une tache' do |args|
	puts "TODO"
end

Command.register 'list', 'filtre' 'liste les  taches' do |args|
	Task.afficher
end

Command.lancer!

#on_else_çcommand{ afficher_aide }
#parser_commande(command)
Task.afficher

#####################################################################################################

#Les gemmes

# installer une gemme : gem install <nom>
# voir Rubygems.org (+git)




require 'json'

def to_json opts={}
{
	id: @id,
	content: @content,
	flags: @flags,
	is_done: @is_done
}.to_json(opts) # def chaîne str
end

# charger tâches depuis fichier json
def self_load file
	str = File.read(file)
	tableau = JSON.parse(str)
	@tableau_taches = tableau.map do |tache|
	Task.new(tache["id"], tache["content"], { flags: tache["flags"] } , tache["is_done"] ))
	tableau.each do |tache|
	end
end

# save to file json
def self.save file
	File.open(file, "w") do |file| # w = mode d'écriture
		file.write(@tableau_taches..to_json)
	end
end

Task.load "tasks.json"
Task.save "tasks.json"


#####################################################################################################

# initialiser le bundle > bundle initialiser (dans le dossier princp) 


#####################################################################################################


# quelques  réflexions :

# methods
# send
# respond_to? // vérifie une méthode
# is_a? // vérifie qu'un objet hérite bien d'une classe
# class // retourne la classe de l'objt en cours
# instance_of?

# instance_eval => lance un bloc dans le contexte d'un objet

# hash.reject{|k,v| [:id, :content].include?(k) }


################### DSL ######################

Sans DSL

action = Action.new :list_done do
	#faire l'action
	end
	action.description = "liste les taches réalisées"
	ActionManager.add action

	Avec DSL

	ActionManager.register do
		description "liste les taches réalisées"
		action :list_done do
			#faire l'action
		end
	end


	###########
	# monkey patching exs
	# => try
	# ex : str2.try(upcase)

	def try *args
		if self.nil?
			nil
		else
			send *args
			end 
		end
	end 

	#### récupérer une erreur

	begin
		opération
	rescue => e 
		puts "erreur: #{{e}}"
	end
	//

	begin
		opération
	rescue SpecialError => e
		puts "gérer l'erreur"
		recue => e 
		puts "erreur: #{e}"
	end

	// exe même si erreur

	f = fileopen("fichier", "wb")
	begin 
		# opérations fichier
	ensure
		f.close
	end
	