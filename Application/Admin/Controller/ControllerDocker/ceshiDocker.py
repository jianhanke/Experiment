import docker 
import sys

def runContainerById2(name,ip):
	client=docker.from_env()
	print(str(client))
	container=client.containers.run(name,detach=True)
	# myNet=client.networks.get('8cc234f12ebe')
	# myNet.connect(container.short_id,ipv4_address=ip)
	# print('ceshi')
def restartContainerByid(container_id):
	client=docker.from_env()
	container=container=client.containers.get(container_id)
	container.restart()

if __name__ == '__main__':
	restartContainerByid('85f77e09d571')
	