# Docker Apache Php7 Mysql boilerplate

Projet docker de développement permettant d'avoir un serveur web configuré prêt à l'emploi

Version PHP : 7.1.2<br>
Version Mysql : 5.7

Adresse du site par défaut : http://localhost:8080<br>
Adresse de PhpMyAdmin par défaut : http://localhost:8081

L'ensemble des fichiers php sont à mettre dans le dossier `site`
> Voir configuration pour un changement de nom

## Installation 

Telecharger ou cloner le projet

```
git clone https://github.com/averdier/docker_amp_boilerplate
```

## Configuration

Le projet est prêt à l'emploi, la configuration n'est pas obligatoire
> Elle le devient si deux projets docker sont amenés à être lancés en même temps (voir configuration des ports)

### Base de données

Il est possible de changer le nom de la base de données, le nom d'utilisateur et les mots de passes de la base de données
> Attention de reporter le changement dans le service `phpmyadmin`

Ouvrir le fichier `docker-compose.yml` et modifier les valeurs suivantes :
```
MYSQL_DATABASE: <your database name>
MYSQL_USER: <your username>
MYSQL_PASSWORD: <your password>
MYSQL_ROOT_PASSWORD: <your root password>
```

### Ports

Par défaut le projet utilise les ports `8080` et `8081`, dans le cas ou les ports sont utilisées (indiqués lors de l'échec de lancement d'un service) il est possible de changer les ports des services `php_apache` et `phpmyadmin`.

Ouvrir le fichier `docker-compose.yml` et modifier les valeurs suivantes :
> Attention de ne pas mettre les mêmes ports pour les deux services

```
php_apache:
    ...

    ports:
        - <your port>:80
    networks:
        - default
```

```
phpmyadmin:
    ...

    ports:
      - <your port>:80
    networks:
      - default
```

## Lancement

### Premier lancement

Avant de réaliser le premier lancement il est nécessaire de construire le projet, tapez la commande suivante :
> Cela peut prendre un moment
```
docker-compose -f docker/docker-compose.yml build
```

### Usage

#### Démarer le projet

Pour démarrer le projet, tapez la commande suivante :

```
docker-compose -f docker/docker-compose.yml up -d
```

#### Arreter le projet

Pour arreter le projet, tapez la commande suivante :

```
docker-compose -f docker/docker-compose.yml stop
```

## Suivi des erreurs

Il est possible de suivre les états des différents services à l'aide de la commande suivante : 
```
docker-compose -f docker/docker-compose.yml logs <service_name>
```
