let React = window.React
let ReactDOM = window.ReactDOM
let moment = window.moment
let createReactClass = require('create-react-class')

import Header from './Header.js'
import Helpers from './Helpers.js'

let Pagination = createReactClass({
	moveLeft: function(e) {
		let element = jQuery(e.currentTarget).parent().parent().find('.pagination > div')
		let left = parseInt(element.css('left'), 10) + 150
		left = Math.min(left, 0)
		element.animate({ left: `${left}px` }, 250, 'linear')
	},
	moveRight: function(e) {
		let element = jQuery(e.currentTarget).parent().parent().find('.pagination > div')
		let left = parseInt(element.css('left'), 10) - 150
		let len = -(Math.max(0, (element.find('span').length - 11)) * 40)
		left = Math.max(left, len)
		element.animate({ left: `${left}px` }, 250, 'linear')
	},
	render: function() {
		return (
			<div className='pagination-cover'>
			<div className='pagination'>
			<div style={{ left: '0px' }}>
			{[...Array(this.props.pages)].map((x, index) => {
				return (
					<span key={index} className={ index + 1 === this.props.page ? 'active' : '' } onClick={this.props.updatePage.bind(null, index + 1)}>
						{index + 1}
					</span>
				)
			})}
			</div>
			</div>
			<div className='pagination-move'>
			<i className='icon-angle-left' onClick={this.moveLeft}></i>
			<i className='icon-angle-right' onClick={this.moveRight}></i>
			</div>
			</div>
			)
	}
})

module.exports = Pagination
