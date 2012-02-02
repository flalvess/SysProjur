jQuery.fn.foto_pass = function(options)
{
	var defaults = {
		auto :true,
		intervalo :3500
	};

	options = jQuery.extend(defaults, options);

	var jQueryMatchedObj = this;
	var timer = null;
	var destaques = new Array();
	var ponteiro = 0;

	function _initialize()
	{
		clearTimeout(timer);
		destaques = jQuery('#foto div.foto');
		_run();
	}

	function _start()
	{
		if (ponteiro < (destaques.length - 1))
		{
			ponteiro++;
		} else
		{
			ponteiro = 0;
		}

		_view();
		_run();
	}

	function _view()
	{
		for ( var i = 0; i < destaques.length; i++)
		{
			jQuery(destaques[i]).hide();
		}
		jQuery(destaques[ponteiro]).fadeIn(1700);
	}

	function _run()
	{
		if (options.auto)
		{
			timer = setTimeout(_start, options.intervalo);
		}
	}

	this.pause = function()
	{
		clearTimeout(timer);
	}

	this.next = function()
	{
		this.pause();

		if (ponteiro < (destaques.length - 1))
		{
			ponteiro++;
		} else
		{
			ponteiro = 0;
		}

		_view();
		_run();
	}

	this.prior = function()
	{
		this.pause();

		if (ponteiro > 0)
		{
			ponteiro--;
		} else
		{
			ponteiro = (destaques.length - 1);
		}

		_view();
		_run();
	}

	_initialize(jQueryMatchedObj);

	return this;
}
