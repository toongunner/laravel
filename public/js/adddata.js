$(document).ready(function()
		{	
			$("#transf").click(function()
					{
						$("#transformer").show();
						$("#met").hide();
						$("#mdb").hide();
						$("#generator").hide();
						$("#rectifier").hide()
						$("#battery").hide();
						$("#air").hide();
						$("#ups").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#meter").click(function()
					{
						$("#met").show();
						$("#transformer").hide();
						$("#mdb").hide();
						$("#generator").hide();
						$("#rectifier").hide();
						$("#battery").hide();
						$("#air").hide();
						$("#ups").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#mdp").click(function()
					{
						$("#mdb").show();
						$("#transformer").hide();
						$("#met").hide();
						$("#generator").hide();
						$("#rectifier").hide();
						$("#battery").hide();
						$("#air").hide();
						$("#ups").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#gen").click(function()
					{
						$("#generator").show();
						$("#mdb").hide();
						$("#transformer").hide();
						$("#met").hide();
						$("#rectifier").hide();
						$("#battery").hide();
						$("#air").hide();
						$("#ups").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#rec").click(function()
					{
						$("#rectifier").show()
						$("#generator").hide();
						$("#mdb").hide();
						$("#transformer").hide();
						$("#met").hide();
						$("#battery").hide();
						$("#air").hide();
						$("#ups").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#batt").click(function()
					{
						$("#battery").show();
						$("#rectifier").hide()
						$("#generator").hide();
						$("#mdb").hide();
						$("#transformer").hide();
						$("#met").hide();
						$("#air").hide();
						$("#ups").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#ac").click(function()
					{
						$("#air").show();
						$("#battery").hide();
						$("#rectifier").hide()
						$("#generator").hide();
						$("#mdb").hide();
						$("#transformer").hide();
						$("#met").hide();
						$("#ups").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#up").click(function()
					{
						$("#ups").show();
						$("#air").hide();
						$("#battery").hide();
						$("#rectifier").hide()
						$("#generator").hide();
						$("#mdb").hide();
						$("#transformer").hide();
						$("#met").hide();
						$("#imgs").hide();
						$("#invert").hide();
					}
			);
			$("#inv").click(function()
					{
						$("#invert").show();
						$("#ups").hide();
						$("#air").hide();
						$("#battery").hide();
						$("#rectifier").hide()
						$("#generator").hide();
						$("#mdb").hide();
						$("#transformer").hide();
						$("#met").hide();
						$("#imgs").hide();
					}
			);
			$("#img").click(function()
					{
						$("#imgs").show();
						$("#ups").hide();
						$("#air").hide();
						$("#battery").hide();
						$("#rectifier").hide()
						$("#generator").hide();
						$("#mdb").hide();
						$("#transformer").hide();
						$("#met").hide();
						$("#invert").hide();
					}
			);
			
		}
);