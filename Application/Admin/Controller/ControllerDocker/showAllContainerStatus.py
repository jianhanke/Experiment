import docker 
import sys


def showContainerStatus(container_id):
	client = docker.from_env()
	container=client.containers.get(container_id)
	print(container.attrs['Config']['Hostname'])

def showAllContainerStatus():
	client = docker.from_env()
	lists=client.containers.list(all=True)
	info=[]
	for i in lists:
		name=(i.attrs['Config']['Hostname']).encode('utf-8')
		status=(i.attrs['State']['Status']).encode('utf-8')
		one=[]
		one.append(name)
		one.append(status)
		info.append(one)
	print(info)
if __name__ == '__main__':
	# showContainerStatus('7283aa2567cd')
	showAllContainerStatus()
