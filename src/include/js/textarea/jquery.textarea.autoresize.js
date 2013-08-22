$('textarea,input').autoResize({
	onBeforeResize: function(){
		console.log('Before');
		$(this).css('background', '#FFFFFF');
	},
	onAfterResize: function(){
		console.log('After');
		$(this).css('background', '');
	}
});
