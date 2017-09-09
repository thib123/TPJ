Notes Ruby

Organiser les tâches :

taskman list
taskman add "Apprendre Ruby"
taskman mod 2 flag:important date:demain
taskman del 1

# => quote
tester plusieurs conditions en même temps : and/or ou && // ||

Initialiser un tableau :
fruits = %w(pomme poire ananas)
#ou
fruits = ["pomme", "poire", "ananas"]
Voir sur ruby-doc.org pour la liste des string/array
//


constance => fonctionne comme une variable
ex : CONSTANTE = "je suis une constante"
puts CONSTANTE
(dans la console)


ARGV (argument)
p = puts = afficher

puts ARGV.inspect
=> inspect = afficher les valeurs des variables

p ARGV[0]
p ARGV[1]

p ARGV.count

ARGV.each do |x| // each = pour chaque ; x = l'élément
         p x


// boucles et conditions

montrer le code dans un bloc => Tab

ARGV.each do |x| 
         p x
end


///

command = ARGV.shift  // tab.shift => recup le premier élément

if command == 'add'
    puts 'faire action add'
elseif command == 'del'
    puts 'faire action delete'
elseif command == 'mod'
    puts 'faire action modifier'
else
    puts 'faire autre acyion'
end

/// code commande

command = ARGV.shift

case command 
when 'add'
    contenu = ARGV.shift
    
    
    #for argument in ARGV
    #puts "arg = #(argument)"
    #end
    
    #whilei = ARGV.shift
    #puts "#(i)"
    #end
    
    
    ARGV.each do |arguments|
    champ, valeur = argument.split(':')
    
    case champ
    when 'flags'
        p "ajouter flags" + valeur.inspect // ou #(valeur)
    when 'date'
        p "Ajouter date"
        else
        puts "Je ne comprend pas #{argument}"
    end
end
    
    
    puts 'faire action add'
when 'del'
    puts 'faire action del'
when 'mod'
    puts 'faire action mod'
else
    puts 'faire autre acyion'
end

// embranchements multiples

case variaible
    when 1
        puts "Exécuter lorsque variable vaut 1"
    when 2
        puts "Exectuer lorsque variable vaut 2"
    #etc
    else
        puts "toutes les autres valeurs exécuterons ce code"
    end
    
// le while

x = 0
while x < 5
puts "#[x}"
x+=1
end

// Autres :

unless x == if not x
until x == while not x
loop/break
Voir wiki ruby boucles


// Les tableaux

Initialiser un tableau :
mon_tableau = []
#ou
mon_tableau ) Array.new


/// code tableau

command = ARGV.shift

tableau_taches = [
{ id: 0, :content => "Ameliorer taskman", flags: %w(cimportant urgent) }
#[0, "ameliorer taskman", "flags", "important,urgent"]
]

case command 
when 'add'
    contenu = ARGV.shift
    
    tache = {}
           
    tache[:id] = tableau_taches.map{ |tache| tache|:id|}.max+1
    
    OPTIONS_DEFAULT = {
    flags: [],
    date: nil
    }
    
    tache.merge!(OPTIONS_DEFAULT)
    
    tache[:content] = contenu
    
    ARGV.each do |arguments|
    champ, valeur = argument.split(':')
    
    
    tache[champ.to.sym] = valeur

    #case champ
    #when 'flags'
    #    p "ajouter flags" + valeur.inspect // ou #(valeur)
    #when 'date'
    #    p "Ajouter date"
    #    else
    #    puts "Je ne comprend pas #{argument}"
    #end
end
    
    
tableau_taches << tache
when 'del'
    id = ARGV.shift
    
    tableau_taches = tableau_taches.reject{|tache| tache|:id|==id.to.i }

when 'mod'
    puts 'faire action mod'
else
    puts 'faire autre acyion'
end

puts "*****TASKMAN*****"
puts "LISTE DES TACHES"

tableau_taches.each do |tache|
    puts "#{tache[:id]} - #{tache[:content]} (#{tache[:flags].join(",")})"
end