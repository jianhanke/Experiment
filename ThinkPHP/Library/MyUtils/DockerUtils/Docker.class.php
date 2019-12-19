<?php

namespace MyUtils\DockerUtils;

interface Docker{

	public function pullImageByName($imageName);

	public function showAllImage();

    public function showContainerById($container_id);

    public function showContainerStatus($container_id);
    
 	public function showAllContainer();

    public function startContainerById($container_id);

    public function stopContainerById($container_id);

    public function deleteContainerById($container_id);

    public function runContainerByIdIp($image_id,$ip,$hostName=Null,$link_Container=Null);

    public function restartContainerById($container_id);

    public function commitContainerById($container_id);

    public function getName();
    
}
