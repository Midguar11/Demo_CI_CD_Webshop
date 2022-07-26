node {
  
  stage('Cloning The project from Github ') {
    git branch: 'master', url: 'https://github.com/Midguar11/Demo_CI_CD_Webshop.git'
  }
  
  stage('Sonarqube Scan') {
    def scannerHome = tool 'SonarQube 4.7';
    withSonarQubeEnv('sonarqube') {
      sh "${scannerHome}/bin/sonar-scanner \
      -D sonar.projectKey=Demo_Webshop \
      "
    }
  }
 
  stage("Quality Gate / Passed"){
    timeout(time: 2, unit: 'MINUTES') { // Just in case something goes wrong, pipeline will be killed after a timeout
    waitForQualityGate abortPipeline: true    
    }
  }
  
  stage('Docker Compose'){
    sh 'sudo docker-compose build'
    sh 'docker --version'
    sh 'sudo docker tag demo_webshop_web:latest midguar/demo_webshop_web:latest'
  }
  
  stage("Docker Hub Login"){
    withCredentials([string(credentialsId: 'DOCKER_HUB_PASSWORD', variable: 'PASSWORD')]) {
        sh 'docker login -u midguar -p $PASSWORD'
    }
  }
  
  stage('Docker Hub Push'){
    sh 'docker push midguar/demo_webshop_web:latest'
  }
  
  stage('Run App Docker Build'){
    sh 'sudo docker-compose up -d'
  }
  
  stage('Workflow Completed try the webshop'){
    echo 'http://demoapp1.devopsempire.com/'
  }

   stage("Finished Build Send email to Admin"){
        emailext attachLog: true, body: 'DemoApp1 Webshop Build Completed', subject: 'DemoApp1_Webshop_pipeline', to: 'szendiattila11@gmail.com'
    }
  
}
