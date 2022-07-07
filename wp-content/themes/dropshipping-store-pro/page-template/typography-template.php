<?php
/**
 * Template Name:Typography Template
 */

get_header();

get_template_part( 'template-parts/banner/banner' );

do_action('drop_shipping_pro_before_typography');

?>
<div id="typography-sec" class="container pb-5 mt-5">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
			<div class="ps-post__content">
				<h1>Heading 1</h1>
				<h2>Heading 2</h2>
				<h3>Heading 3</h3>
				<h4>Heading 4</h4>
				<h5>Heading 5</h5>
				<h6>Heading 6</h6>
				<h2 class="my-4 display-6">Dropcaps</h2>
				<div class="row">
					<div class="col-lg-6">
						<div class="sc_dropcaps sc_dropcaps_style_1">
							<span style="float: left; width: 0.8em; font-size: 600%; font-family: algerian, courier; line-height: 80%; text-align: justify;">A</span>
					  					drop cap is a decorative element typically used in documents at the start of a section or chapter. It’s a large capital letter at the beginning or a paragraph or text block that has the depth of two or more lines of normal text.
						</div>
					</div>
					<div class="col-lg-6">
						<div class="sc_dropcaps sc_dropcaps_style_1">
							<span style="float: left; width: 0.8em; font-size: 600%; font-family: algerian, courier; line-height: 80%; text-align: justify;">A</span>
					  					drop cap is a decorative element typically used in documents at the start of a section or chapter. It’s a large capital letter at the beginning or a paragraph or text block that has the depth of two or more lines of normal text.
						</div>
					</div>
				</div>
				<h2 class="mt-4 mb-4">Blockquotes</h2>
				<blockquote><p class="ms-lg-4 ms-md-4 ms-4 ms-sm-4">
					People think focus means saying yes to the thing you’ve got to focus on. But that’s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I’m actually as proud of the things we haven’t done as the things I have done. Innovation is saying no to 1,000 things.</p>
				</blockquote>
				<p class="ms-5"><cite style="    color: var(--color-313a43);font-weight: 600;">Steve Jobs</cite> – Apple Worldwide Developers’ Conference, 1997</p>
				<h2 class="mt-4 mb-2">Tables</h2>
				<table class="table table-striped ms-lg-3 ms-md-3 ms-sm-0 ms-0">
				<thead>
				<tr>
				<th>Employee</th>
				<th>Salary</th>
				<th></th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<th><a>John Doe</a></th>
				<td>$1</td>
				<td>Because that’s all Steve Jobs needed for a salary.</td>
				</tr>
				<tr>
				<th><a>Jane Doe</a></th>
				<td>$100K</td>
				<td>For all the blogging she does.</td>
				</tr>
				<tr>
				<th><a>Fred Bloggs</a></th>
				<td>$100M</td>
				<td>Pictures are worth a thousand words, right? So Jane x 1,000.</td>
				</tr>
				<tr>
				<th><a>Jane Bloggs</a></th>
				<td>$100B</td>
				<td>With hair like that?! Enough said…</td>
				</tr>
				</tbody>
				</table>
				<h2 class="mt-4 mb-2">Definition Lists</h2>
				<dl class="dl-horizontal">
				<dt>Definition List Title</dt>
				<dd>Definition list division.</dd>
				<dt>Startup</dt>
				<dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd>
				<dt>#dowork</dt>
				<dd>Coined by Rob Dyrdek and his personal body guard Christopher “Big Black” Boykins, “Do Work” works as a self motivator, to motivating your friends.</dd>
				<dt>Do It Live</dt>
				<dd>I’ll let Bill O’Reilly will <a title="We'll Do It Live" href="https://www.youtube.com/watch?v=O_HyZ5aW76c">explain</a> this one.</dd>
				</dl>
				<h2 class="mt-4 mb-2">Unordered Lists (Nested)</h2>
				<ul class="unorder-list">
				<li>List item one
				<ul>
				<li>List item one
				<ul>
				<li>List item one</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
				</ul>
				</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
				</ul>
				</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
				</ul>
				<h2 class="mt-4 mb-2">Ordered List (Nested)</h2>
				<ol class="order-list">
				<li>List item one
				<ol>
				<li>List item one
				<ol>
				<li>List item one</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
				</ol>
				</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
				</ol>
				</li>
				<li>List item two</li>
				<li>List item three</li>
				<li>List item four</li>
				</ol>
				<h2 class="mt-4 mb-2">HTML Tags</h2>
				<p>These supported tags come from the WordPress.com code <a title="Code" href="https://en.support.wordpress.com/code/">FAQ</a>.</p>
				<p><strong>Address Tag</strong></p>
				<address>1 Infinite Loop<br>
				Cupertino, CA 95014<br>
				United States</address>
				<p><strong>Anchor Tag (aka. Link)</strong></p>
				<p>This is an example of a <a title="Apple" href="https://apple.com">link</a>.</p>
				<p><strong>Abbreviation Tag</strong></p>
				<p>The abbreviation <abbr title="Seriously">srsly</abbr> stands for “seriously”.</p>
				<p><strong>Acronym Tag (<em>deprecated in HTML5</em>)</strong></p>
				<p>The acronym <abbr title="For The Win">ftw</abbr> stands for “for the win”.</p>
				<p><strong>Big Tag&nbsp;<strong>(<em>deprecated in HTML5</em>)</strong></strong></p>
				<p>These tests are a <strong>big</strong> deal, but this tag is no longer supported in HTML5.</p>
				<p><strong>Cite Tag</strong></p>
				<p>“Code is poetry.” —<cite>Automattic</cite></p>
				<p><strong>Code Tag</strong></p>
				<p>You will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend.</p>
				<p><strong>Delete Tag</strong></p>
				<p>This tag will let you <del>strikeout text</del>, but this tag is no longer supported in HTML5 (use the <code>&lt;strike&gt;</code> instead).</p>
				<p><strong>Emphasize Tag</strong></p>
				<p>The emphasize tag should <em>italicize</em> text.</p>
				<p><strong>Insert Tag</strong></p>
				<p>This tag should denote <ins>inserted</ins> text.</p>
				<p><strong>Keyboard Tag</strong></p>
				<p>This scarcely known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag.</p>
				<p><strong>Preformatted Tag</strong></p>
				<p>This tag styles large blocks of code.</p>
				<pre>.post-title {
					margin: 0 0 5px;
					font-weight: bold;
					font-size: 38px;
					line-height: 1.2;
					and here's a line of some really, really, really, really long text, just to see how the PRE tag handles it and to find out how it overflows;
				}</pre>
				<p><strong>Quote Tag</strong></p>
				<p><q>Developers, developers, developers…</q> –Steve Ballmer</p>
				<p><strong>Strike Tag&nbsp;<strong>(<em>deprecated in HTML5</em>)</strong></strong></p>
				<p>This tag shows <span style="text-decoration: line-through;">strike-through text</span></p>
				<p><strong>Strong Tag</strong></p>
				<p>This tag shows <strong>bold<strong> text.</strong></strong></p>
				<p><strong>Subscript Tag</strong></p>
				<p>Getting our science styling on with H<sub>2</sub>O, which should push the “2” down.</p>
				<p><strong>Superscript Tag</strong></p>
				<p>Still sticking with science and Isaac Newton’s E = MC<sup>2</sup>, which should lift the 2 up.</p>
				<p><strong>Teletype Tag&nbsp;<strong>(<em>deprecated in HTML5</em>)</strong></strong></p>
				<p>This rarely used tag emulates teletype text, which is usually styled like the <code>&lt;code&gt;</code> tag.</p>
				<p><strong>Variable Tag</strong></p>
				<p>This allows you to denote <var>variables</var>.</p>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-12" id="sidebar">
			 <?php dynamic_sidebar('sidebar-left'); ?>
		</div>
	</div>
</div>

<?php do_action('drop_shipping_pro_before_footer'); ?>
<?php get_footer(); ?>