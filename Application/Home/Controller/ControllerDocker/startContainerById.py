#!/usr/bin/python

import docker 
import sys



def startContainerById(id):
	client=docker.from_env()
	container=client.containers.get(id)
	container.start()

if __name__ == '__main__':
	startContainerById(sys.argv[1])
