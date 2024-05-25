# Etapes pour conteneuriser l'application

- Créer un dockerfile pour l'application cf [Dockerfile](./Dockerfile)
- Build l'image via cette command dans le meme dossier que le Dockerfile ```  docker build -t <nom de limage>:<version> . ```
- Lancer l'image via cette commande ``` docker run -it -P 8080:80 <nom de l'image> ```

- POur l'instant pour tous lancer il suffit de lancer la commande ``` docker compose up ```