using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model
{
    interface NewCardListener
    {
        void CardWasDealt(model.Player player);
    }
}
