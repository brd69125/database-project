/* 
 *  description
 * 
 *  @category resource files
 *  @author Brody Bruns <brody.bruns@hotmail.com>
 *  @copyright (c) 2016, Brody Bruns
 *  @version 1.0
 * 
 */

function toggleNearestUpdateForm(element){
    console.log($(element).siblings().first());
    $(element).siblings().first().toggle();
}
