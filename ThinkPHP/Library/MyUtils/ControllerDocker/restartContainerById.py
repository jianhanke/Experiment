#!/usr/bin/python
import docker 
import sys


def restartContainerById(container_id):
	client=docker.from_env()
	container=container=client.containers.get(container_id)
	container.restart()


if __name__ == '__main__':
	restartContainerById(sys.argv[1])