<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>	
	{header}
	</head>
	<body>
		<div id="admincp_base"></div>
		<div id="global_ajax_message"></div>

		{*
		<div id="top_holder">
		<div id="main_top_fixed">
			<div id="main_top">
				<div class="main_holder">
					<div id="main_top_inner">
						<a href="{url link='admincp'}" id="logo">AdminCP</a>
						<div id="user_info_link">
							{phrase var='admincp.logged_in_as' user=$aUserDetails} <span class="separator">|</span> <a href="{url link=''}">{phrase var='admincp.view_site'}</a>					
						</div>
					</div>
				</div>
			</div>
		*}

		<div id="header">
			<a href="#" class="header_logo">AdminCP</a>
		</div>


		<div id="top">
			<div class="nano">
				<div class="main_menu_holder nano-content">

					<div class="admincp_user">
						<div class="admincp_user_image">
							{img user=$aUserDetails suffix='_50_square'}
						</div>
						<div class="admincp_user_content">
							{$aUserDetails|user}
							<div>
								<a href="{url link=''}">View Site</a>
							</div>
						</div>
					</div>

					<ul class="main_menu">
						{foreach from=$aAdminMenus key=sPhrase item=sLink}
						{if is_array($sLink)}
						{if count($sLink)}
						<li class="main_menu_link_li"><a class="main_menu_link" href="#">{$sPhrase}</a>
							<div class="main_sub_menu">
								<ul>
								{foreach from=$sLink key=sPhrase2 item=sLink2}
									{if is_array($sLink2)}
									<li class="{if isset($sLink2.highlight) && $sLink2.highlight} focus{/if}">
										<a href="{$sLink2.url}" class="popup">
											{$sPhrase2}{if isset($sLink2.message)}<span>{$sLink2.message}</span>{/if}
										</a>
									</li>
									{elseif is_numeric($sPhrase2)}
									<li class="separator">{$sLink2}</li>
									{else}
									<li><a href="{url link=$sLink2}">{$sPhrase2}</a></li>
									{/if}
								{/foreach}
								</ul>
							</div>
						</li>
						{/if}
						{elseif is_numeric($sPhrase)}
						<li class="separator">{$sLink}</li>
						{else}
						<li><a href="{url link=''$sLink''}" class="main_menu_link">{$sPhrase}</a></li>
						{/if}
						{/foreach}
					</ul>
				</div>
			</div>
		</div>
	</div>

			<div class="main_title_holder">
				{$sSectionTitle}
				{if isset($aActionMenu)}
				<div class="admin_action_menu">
					<ul>
						{foreach from=$aActionMenu key=sPhrase item=sUrl}
						<li>
							{if is_array($sUrl)}
							<a href="{$sUrl.url}" class="{$sUrl.class}"{if isset($sUrl.custom)} {$sUrl.custom}{/if}>{$sPhrase}</a>
							{else}
							<a href="{$sUrl}">{$sPhrase}</a>
							{/if}
						</li>
						{/foreach}
					</ul>
				</div>
				{/if}
			</div>

			<div class="main_holder">					
				<div id="js_content_container">					
					<div id="main">

						{if isset($aSectionAppMenus)}
						<div class="apps_menu">
							{$ActiveApp.icon}

							<ul>
							{foreach from=$aSectionAppMenus key=sPhrase item=aMenu}
								<li><a href="{url link=$aMenu.url}"{if $aMenu.is_active} class="active"{/if}>{$sPhrase}</a></li>
							{/foreach}
							</ul>
						</div>
						<div class="apps_content">
						{/if}

							{error}
							<div class="_block_content">
								{content}
							</div>

						{if isset($aSectionAppMenus)}
						</div>
						{/if}

					</div>
				</div>		
				
				<div id="copyright">
					{param var='core.site_copyright'} {product_branding}
				</div>		
						
			</div>		
		{plugin call='theme_template_body__end'}	
        {loadjs}
	</body>
</html>