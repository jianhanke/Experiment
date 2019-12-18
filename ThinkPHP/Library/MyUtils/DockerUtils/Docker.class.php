<?php

interface Docker{

	public function pullImageByName();

	public function showAllImage();

    public function showContainerById();

    public function showContainerStatus();
    
 	public function showAllContainer();

    public function startContainerById();

    public function stopContainerById(){;

    public function deleteContainerById();

    public function runContainerByIdIp();

    public function restartContainerById();
    	
    public function commitContainerById();

    public function getNewIp();

}