#!/usr/bin/python
import docker 
import sys


def pullImageByName(imageName):
	client = docker.from_env()
	container=client.containers.get(container_id)
	image=client.images.pull(imageName);
	print(image.short_id);

if __name__ == '__main__':
	getContainerStatus(sys.argv[1])
