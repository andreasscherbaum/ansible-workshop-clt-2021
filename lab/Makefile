all:
	@echo "Available targets:"
	@echo "deploy, shutdown, destroy, prerequisites"

deploy:
	ansible-playbook clt_lab.yml --vault-password-file vault_pass.txt

shutdown:
	ansible-playbook shutdown.yml --vault-password-file vault_pass.txt

destroy:
	ansible-playbook destroy.yml --vault-password-file vault_pass.txt

prerequisites:
	ansible-playbook prerequisites.yml --vault-password-file vault_pass.txt
