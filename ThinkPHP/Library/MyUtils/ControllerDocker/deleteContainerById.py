#!/usr/bin/python
import docker 
import sys

def deleteContainerByid(id):
	client=docker.from_env()
	container=client.containers.get(id)
	container.remove(force=True)

if __name__ == '__main__':
	deleteContainerByid(sys.argv[1])
	