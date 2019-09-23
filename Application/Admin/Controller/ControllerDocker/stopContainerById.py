#!/usr/bin/python
import docker 
import sys

def stopContainerByid(id):
	client=docker.from_env()
	container=client.containers.get(id)
	container.stop()

if __name__ == '__main__':
	stopContainerByid(sys.argv[1])
	