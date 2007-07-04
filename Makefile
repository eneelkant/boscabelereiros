#!/bin/make

APACHE_BASE = /var/www
PROJETO = boscabelereiros
BROWSER = firefox

deploy: $(APACHE_BASE)/$(PROJETO)/banco.php $(APACHE_BASE)/$(PROJETO)/crud-produtos.php \
		$(APACHE_BASE)/$(PROJETO)/pagina.php $(APACHE_BASE)/$(PROJETO)/index.php\
		$(APACHE_BASE)/$(PROJETO)/produtos.php $(APACHE_BASE)/$(PROJETO)/img/banner.png \
		$(APACHE_BASE)/$(PROJETO)/img/caso-de-uso.png $(APACHE_BASE)/$(PROJETO)/img/diagrama-classes.png \
		$(APACHE_BASE)/$(PROJETO)/img/logo.png $(APACHE_BASE)/$(PROJETO)/img/logo-small.png \
		$(APACHE_BASE)/$(PROJETO)/style/base.css $(APACHE_BASE)/$(PROJETO)/style/produtos.css \
		$(APACHE_BASE)/$(PROJETO)/doc/proposta.pdf $(APACHE_BASE)/$(PROJETO)/crud-usuarios.php \
		$(APACHE_BASE)/$(PROJETO)/style/home.css $(APACHE_BASE)/$(PROJETO)/usuarios.php \
		$(APACHE_BASE)/$(PROJETO)/script/mktree.js $(APACHE_BASE)/$(PROJETO)/style/mais.gif \
		$(APACHE_BASE)/$(PROJETO)/style/menos.gif $(APACHE_BASE)/$(PROJETO)/style/menu.css \
		$(APACHE_BASE)/$(PROJETO)/img/logo.png $(APACHE_BASE)/$(PROJETO)/crud-funcionarios.php \
		$(APACHE_BASE)/$(PROJETO)/funcionarios.php $(APACHE_BASE)/$(PROJETO)/contato.php \
		$(APACHE_BASE)/$(PROJETO)/img/contato.jpg

################ arquivos ###################

# phps #
$(APACHE_BASE)/$(PROJETO)/banco.php: banco.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/crud-produtos.php: crud-produtos.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/index.php: index.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/pagina.php: pagina.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/produtos.php: produtos.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/contato.php: contato.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/usuarios.php : usuarios.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/crud-usuarios.php : crud-usuarios.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/crud-funcionarios.php: crud-funcionarios.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/funcionarios.php: funcionarios.php $(APACHE_BASE)/$(PROJETO)
	cp $< $@

# imagens #
$(APACHE_BASE)/$(PROJETO)/img/banner.png: img/banner.png $(APACHE_BASE)/$(PROJETO)/img
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/img/contato.jpg: img/contato.jpg $(APACHE_BASE)/$(PROJETO)/img
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/img/caso-de-uso.png: img/caso-de-uso.png $(APACHE_BASE)/$(PROJETO)/img
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/img/diagrama-classes.png: img/diagrama-classes.png $(APACHE_BASE)/$(PROJETO)/img
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/img/logo.png: img/logo.png $(APACHE_BASE)/$(PROJETO)/img
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/img/logo-small.png: img/logo-small.png $(APACHE_BASE)/$(PROJETO)/img
	cp $< $@

# estilo #
$(APACHE_BASE)/$(PROJETO)/style/base.css: style/base.css $(APACHE_BASE)/$(PROJETO)/style
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/style/menu.css: style/menu.css $(APACHE_BASE)/$(PROJETO)/style
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/style/home.css: style/home.css $(APACHE_BASE)/$(PROJETO)/style
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/style/produtos.css: style/produtos.css $(APACHE_BASE)/$(PROJETO)/style
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/style/mais.gif: style/mais.gif $(APACHE_BASE)/$(PROJETO)/style
	cp $< $@

$(APACHE_BASE)/$(PROJETO)/style/menos.gif: style/menos.gif $(APACHE_BASE)/$(PROJETO)/style
	cp $< $@

# docs #
$(APACHE_BASE)/$(PROJETO)/doc/proposta.pdf: doc/proposta.pdf $(APACHE_BASE)/$(PROJETO)/doc
	cp $< $@

# scripts #
$(APACHE_BASE)/$(PROJETO)/script/mktree.js: script/mktree.js $(APACHE_BASE)/$(PROJETO)/script
	cp $< $@

############# Cria diretorios #################

$(APACHE_BASE)/$(PROJETO)/img/produtos:  $(APACHE_BASE)/$(PROJETO)/img
	if [ ! -d $@ ]; then \
		mkdir $@; \
		chmod 777 $@; \
	fi

$(APACHE_BASE)/$(PROJETO)/img:  $(APACHE_BASE)/$(PROJETO)
	if [ ! -d $@ ]; then \
		mkdir $@; \
	fi

$(APACHE_BASE)/$(PROJETO)/style:  $(APACHE_BASE)/$(PROJETO)
	if [ ! -d $@ ]; then \
		mkdir $@; \
	fi

$(APACHE_BASE)/$(PROJETO)/doc:  $(APACHE_BASE)/$(PROJETO)
	if [ ! -d $@ ]; then \
		mkdir $@; \
	fi

$(APACHE_BASE)/$(PROJETO)/script:  $(APACHE_BASE)/$(PROJETO)
	if [ ! -d $@ ]; then \
		mkdir $@; \
	fi

$(APACHE_BASE)/$(PROJETO): 
	if [ ! -d $(APACHE_BASE)/$(PROJETO) ]; then \
		sudo mkdir $(APACHE_BASE)/$(PROJETO); \
		sudo chown $(USER) $(APACHE_BASE)/$(PROJETO); \
	fi

############# Roda browser na pagina do projeto ###############
run:
	$(BROWSER) http://localhost/$(PROJETO)/ &

############# Limpa servidor ################

clean:
	$(RM) -r $(APACHE_BASE)/$(PROJETO)/*


