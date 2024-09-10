

jsPlumb.ready(function () {
    // Suppliers to Ingredients
    jsPlumb.connect({
        source: "supplier_tbl", 
        target: "ingredient_tbl", 
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Ingredients to Items
    jsPlumb.connect({
        source: "ingredients_tbl",
        target: "item_tbl",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Items to Meals
    jsPlumb.connect({
        source: "item_tbl",
        target: "meals_tbl",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Meals to Menuitems
    jsPlumb.connect({
        source: "meals_tbl",
        target: "menuitems_tbl",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Items to MadeWith (many-to-many relationship)
    jsPlumb.connect({
        source: "items_tbl",
        target: "madewith_tbl",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // MadeWith to Ingredients
    jsPlumb.connect({
        source: "madewith_tbl",
        target: "ingredients_tbl",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // PartOf to Meals
    jsPlumb.connect({
        source: "partof_tbl",
        target: "meals_tbl",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // PartOf to Items
    jsPlumb.connect({
        source: "partof_tbl",
        target: "item_tbl",
        anchors: ["Right", "Left"],
        endpoint: "Rectangle"
    });

    // Enable dragging for better interaction
    jsPlumb.draggable("suppliers");
    jsPlumb.draggable("ingredients");
    jsPlumb.draggable("items");
    jsPlumb.draggable("meals");
    jsPlumb.draggable("menuitems");
    jsPlumb.draggable("madewith");
    jsPlumb.draggable("partof");
});
