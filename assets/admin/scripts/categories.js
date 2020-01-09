// import { request } from 'graphql-request'
import { GraphQLClient } from 'graphql-request'

const endpoint = 'http://store.box/graphql/'
const categoryQuery = `
query getCategories($id: Int) {
    Category(id: $id) {
      id
      name
      slug
      description
      subcategory {
        id
        name
        slug
      }
    }
  }`

$(document).ready(function() {

    $('#product_category').change(function () {
        const variables = {
            id: this.value
        }

        const graphQLClient = new GraphQLClient(endpoint, {
            // credentials: 'include',
            mode: 'cors'
        })

        graphQLClient.request(categoryQuery, variables).then(data => {
            var subs = data.Category.subcategory

            var subCat = $('#product_subCategory')
            subCat.empty()

            $.each(subs, function(key, value) {
                subCat
                    .append($("<option></option>")
                        .attr("value",value.id)
                        .text(value.name));
            });
        })
    })

    //To trigger the event and get the subcategories for the default option displayed
    $('#product_category').change()
});
