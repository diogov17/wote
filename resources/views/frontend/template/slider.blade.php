<div class="hero_home version_1">
	<div class="content">
		<h3>Portal dos Artistas!</h3>
		<p class="descricaoHome">
			Encontra aqui artistas que são teus amigos, eventos próximos de ti, e muito mais!
		</p>
		<!-- Redireccionar para página pesquisa; -->
		<form method="get" action="{{ URL::action('SearchController@index') }}" class="formPesquisaHome">
			<div id="custom-search-input">
				<div class="input-group">
					<input type="text" class=" search-query" placeholder="Ex.: Noite Branca, José Fernando,..." name="pesquisaLivre">
					<input type="submit" class="btn_search" value="Pesquisar">
				</div>
				<ul>
					<li>
						<input type="radio" id="all" name="tipoPesquisa" value="0" <?php if($tipoPesquisa==0) Echo "checked" ?> >
						<label for="all">Tudo</label>
					</li>
					<li>
						<input type="radio" id="artistas" name="tipoPesquisa" value="1" <?php if($tipoPesquisa==1) Echo "checked" ?> >
						<label for="artistas">Artistas</label>
					</li>
					<li>
						<input type="radio" id="eventos" name="tipoPesquisa" value="2" <?php if($tipoPesquisa==2) Echo "checked" ?> >
						<label for="eventos">Eventos</label>
					</li>
					<li>
						<input type="radio" id="organizadores" name="tipoPesquisa" value="3" <?php if($tipoPesquisa==3) Echo "checked" ?> >
						<label for="organizadores">Organizadores</label>
					</li>
				</ul>
			</div>
		</form>
	</div>
</div>
<!-- /Hero -->