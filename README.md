# Demo CI CD Webshop

- Create New Pipleline 
- Pipeline Script SCM ( Git )
- https://github.com/Midguar11/Demo_CI_CD_Webshop.git
- */master
- Script Path " Jenkinsfile "

# Pipeline steps:

- Cloning The project from Github
- Sonarqube Scan (Go to the SonarQube server and look at the code analysis)
- Quality Gate / Passed
- Docker Compose
- Docker Hub Login
- Docker Hub Push
- Run App Docker Build
- The build is ready, try the webshop
- Finished Build Send email to Admin

# Once construction is complete. Trigger Remover

- Once the build is complete. It starts another process which removes everything after 15 minutes (
Image, Container and working directory )
- The next attempt thus starts again with a clean slate